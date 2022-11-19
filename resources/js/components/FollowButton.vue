<template>
    <div>
        <button class="btn btn-primary ms-4" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: ['userId', 'follows'],
    data: function () {
        return {
            status: this.follows,
        }
    },
    computed: {
        buttonText() {
            return (this.status) ? 'Unfollow':'Follow'
        },
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        followUser() {
            axios.post('/follow/'+this.userId)
                .then(response => {
                    this.status = ! this.status
                })
                .catch(errors => {
                    if (errors.response.status == 401) {
                        window.location = '/login'
                    }
                })
        }
    },
}
</script>
