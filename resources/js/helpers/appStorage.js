class appStorage{

    //first set item on local storage
    //********************************

    storeToken(access_token){
        localStorage.setItem('token',access_token)
    }

    storeUserId(id){
        localStorage.setItem('id',id)
    }


    storeUserName(name){
        localStorage.setItem('name',name)
    }
    storeUserPhoto(photo){
        localStorage.setItem('photo',photo)
    }


// store item to storage
    store(access_token,name,id,photo){
        this.storeToken(access_token)
        this.storeUserId(id)
        this.storeUserName(name)
        this.storeUserPhoto(photo)
    }

//if wants to clear item
    clear(){
        localStorage.removeItem('token')
        localStorage.removeItem('id')
    }

//get item

    getToken(){
        localStorage.getItem('token')

    }
    getUser(){
        localStorage.getItem('id')
    }

}

export default appStorage = new appStorage();
