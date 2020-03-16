<template>
    <div>
        <ul>
            <li v-for="task in tasks" v-text="task"></li>  
        </ul>
        <div class="form-group">
            <label>Add Task</label>
            <input type="text" name="" class="form-control" v-model="task" @blur="addTask">
        </div>
    </div>    
</template>

<script>
    export default {
        props:['project'],
        methods:{
            addTask(){
                axios.post('/task/'+this.project.id, {description:this.task}).then(response=>{
                    // this.tasks.push(this.task);
                    this.task = '';
                });
            }
        },
        data(){
            return{
                tasks: [],
                task: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        }, 
        created(){
           
           axios.get(/tasks/+this.project.id).then(response=>{
            this.tasks = response.data;
           });
           window.Echo.private('task.'+this.project.id)
            .listen('TaskAdded', e=>{
                console.log(e.task.description);
                // this.tasks.push(e.task.description);
            })
        }
    }
</script>
