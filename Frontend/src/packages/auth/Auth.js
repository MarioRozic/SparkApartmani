export default function(Vue) {
    let authenticatedUser = {}
    Vue.auth = {
        setToken (token, expiration) {
            localStorage.setItem('token', token)
            localStorage.setItem('expiration', expiration)
        },

        getToken () {
            var token = localStorage.getItem('token')
            var expiration = localStorage.getItem('expiration')
            console.log(`token: ${token}`)
            console.log(`expiration: ${expiration}`)
            if( ! token || ! expiration)
                return null

            if(Date.now() > parseInt(expiration)){
                this.destroyToken()
                return null
            } else {
                return token
            }
            
        },

        destroyToken () {
            localStorage.removeItem('token')
            localStorage.removeItem('expiration')
        },

        isAuthenticated () {
            console.log('test')

            if(this.getToken()){
                return true
            } else {
                return false
            }
        },

        setAuthenticatedUser (data) {
            authenticatedUser = data
        },
        getAuthenticatedUser () {
            return authenticatedUser
        }
    }

    Object.defineProperties(Vue.prototype, {
        $auth: {
            get () {
                return Vue.auth
            }
        }
    })
}