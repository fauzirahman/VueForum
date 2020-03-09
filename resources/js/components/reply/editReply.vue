<template>
  <div>      
      <vue-simplemde v-model="replys.reply" ref="markdownEditor" />
      <v-card-actions>
            <v-btn icon small>
                <v-icon color="green" @click="update">save</v-icon>
            </v-btn>
            <v-btn icon small>
                <v-icon color="black" @click="cancel">cancel</v-icon>
            </v-btn>
        </v-card-actions>
  </div>
</template>

<script>      
export default {    
    props:['replys'],
    methods:{
        update(){
            axios.patch(`/api/question/${this.replys.question_slug}/reply/${this.replys.id}`,{body:this.replys.reply})
            .then(res => 
                this.cancel(this.replys.reply)
            )
        },
        cancel(reply){
            EventBus.$emit('cancelEditing',reply);
        }
    }
}
</script>

<style>
    
</style>
