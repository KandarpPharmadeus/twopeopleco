<template>
    <div>
        <ul class="comunity-info">
            <li v-for="question in questions" :key="question.id">
                <div class="grid-item">
                    <div class="img">
                        <img src="/images/user.png" alt="" title="">
                    </div>
                    <div class="content">
                        <div class="title">{{ question.title }}</div>
                        <div class="desc text-truncate">
                            <p>{{ question.content }}</p>
                        </div>
                        <div class="bottom">
                            <div class="leftside">
                                <span class="icons"><i class="fa fa-thumbs-up"></i> <i class="fa fa-thumbs-down"></i></span> <span class="name">john.doe <strong>Maths 6º</strong></span>
                            </div>
                            <div class="rightside text-right">
                                <span class="share"><i class="fa fa fa-share-alt"></i></span>
                                <span class="rating"><i class="fa fa-star"></i></span>
                                
                                
                                <router-link :to="{name: 'edit', params: { id: question.id }}" class="btn btn-primary"><span class="share"><i class="fa fa-edit"></i></span>
                        </router-link>
                                <button class="btn btn-danger" @click="deleteQuestion(question.id)"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>
  
<script>
    export default {
        data() {
            return {
                questions: []
            }
        },
        created() {
            this.axios
                .get('/api/question') 
                .then(response => {
                    this.questions = response.data;
                });
        },
        methods: {
            deleteQuestion(id) {
                this.axios
                    .delete(`/api/question/${id}`)
                    .then(response => {
                        let i = this.questions.map(item => item.id).indexOf(id); // find index of your object
                        this.questions.splice(i, 1)
                    });
            }
        }
    }
</script>