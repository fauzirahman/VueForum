<template>
   <v-toolbar color="primary" dark flat>
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title>Bitflames Forums</v-toolbar-title>
    <v-spacer></v-spacer>
    <app-notification v-if="loggedIn"></app-notification>
    <div class="hidden-sm-and-down" >      
      <router-link v-if="item.show"
      v-for="item in items"
      :key="item.title"
      :to="item.to"            
     >
        <v-btn flat>{{item.title}}</v-btn>
      </router-link>
    </div>
  </v-toolbar>
</template>

<script>
import AppNotification from './AppNotification'
export default {
  components:{AppNotification},
    data(){      
      return{
        loggedIn: User.loggedIn(),
          items: [
          {title: 'Forum', to:'/forum', show:true},              
          {title: 'Ask Question', to:'/ask', show:User.loggedIn()},
          //{title: 'Category', to:'/category', show:User.admin()},
          {title: 'Category', to:'/category', show:User.loggedIn()},
          {title: 'Login', to:'/login', show:!User.loggedIn()},
          {title: 'Logout', to:'/logout', show:User.loggedIn()},
        ]
      }
      
    },
    created(){
    EventBus.$on('logout', ()=>{
      User.logout()
    })
  }
}
    
</script>

<style>

</style>
