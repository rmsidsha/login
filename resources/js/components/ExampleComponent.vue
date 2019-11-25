<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login-page">
                    <div class="form">
                        <form class="login">
                            <input type="text" placeholder="username" v-model="username">
                            <input type="password" placeholder="password" v-model="password">
                            <button type="submit"> Login </button>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

