<template>
   <div class="mt-4">
       <vue-simplemde v-model="body" ref="markdownEditor" />
       <v-btn dark color="green" @click="submitReply">
            Reply
        </v-btn>
   </div>
</template>

<script>  

export default { 
    props:['questionSlug'],
    data(){
        return{
            body:null
        }
    },
    methods:{
        submitReply(){            
            axios.post(`/api/question/${this.questionSlug}/reply`,{body:this.body})
            .then(res => {this.body = ''
            EventBus.$emit('newReply',res.data.reply)
            })
        }
    }
}
</script>

<style>
    
</style>
