<template>
    <div>
    
       <button 
       @click="followUser"
       class="btn btn-primary btn-sm ml-4" 
       v-text = "buttonText" 
       :class= "[buttonText === 'Follow' ? 'green' : 'red']" >Follow</button>  
      
    </div>
</template>

<script>
 export  default {
     props: ['userId', 'follows'],

     mounted() {
         console.log('component mounted')
     },

     data: function () {
         return{
             status: this.follows,
             newCat: ''
         }
     },
     methods:{
         followUser() {
            axios.post('/follow/' + this.userId)
            .then(response => {
                this.status = !this.status
            })
            .catch(errors =>{              
                    window.location = '/login';
            })
         },
         deleteList(index){
       
           this.$delete(this.cats, index)
           
         }
     },
     computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
 }
</script>
<style>
.green{
    background: grey
}
.red{
    background:green
}
</style>
