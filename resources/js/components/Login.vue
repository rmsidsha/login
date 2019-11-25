<template>
<div>
    <div class="login-page">
        <div class="form">
            <!-- <form class="register">
                <input type="text" placeholder="Email" />
                <input type="text" placeholder="name" />
                <input type="password" placeholder="password" />
                <button> REGISTER</button>
            </form> -->
            <form class="login">
                <input type="text" placeholder="username" v-model="username">
                <input type="password" placeholder="password" v-model="password">
                <button type="submit"> Login </button>
            </form>
        </div>
    </div>    
</div>
</template>
<style>
</style>
<script>
export default {
    name: 'Login',
    data:() => ({
        username: '',
        password: '',
    }),
    methods: {
    onSubmit () {
      console.log(this.uid)
      console.log(this.password)
    }
        
    }
}
</script>
