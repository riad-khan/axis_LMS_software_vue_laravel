import Token from './token'
import  appStorage from './appStorage'
class User{
    responseAfterLogin(response){
        const access_token = response.data.access_token
        const id = response.data.id
        const name = response.data.name
        const photo = response.data.photo

        if(Token.isValid(access_token)){
            appStorage.store(access_token,name,id,photo)
        }
    }

    hasToken(){
        const storeToken = localStorage.getItem('token')
        if(storeToken){
            return Token.isValid(storeToken) ? true :false
        }
        return false
    }

    loggedIn(){
        return this.hasToken()
    }

    name(){
        if(this.loggedIn()){
            return localStorage.getItem('name')
        }
    }

    id(){
        if(this.loggedIn()){
            const payload = localStorage.getItem('id')
            return payload.sub
        }
    }
}

export default User = new User()
