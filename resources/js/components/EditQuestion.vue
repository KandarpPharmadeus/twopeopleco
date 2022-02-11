<template>
    <div>
        <h3 class="text-center">Edit Question</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateQuestion">
                      <!-- print errror message -->
                    <errors :errors="errors"></errors>
                    <div class="form-group">
                        <label>Title</label>
                        <textarea name="title" class="form-control" cols="3" rows="1" v-model="question.title" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="title" class="form-control" cols="3" v-model="question.content" ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Question</button>
                </form>
            </div>
        </div>
    </div>
</template>
  
<script>
import Errors from "../components/common/Errors.vue";
    export default {
        components: { Errors },
        data() {
            return {
                question: {},
                errors: {},
            }
        },
        created() {
            this.axios
                .get(`/api/question/${this.$route.params.id}`)
                .then((response) => {
                    this.question = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateQuestion() {
                this.axios
                    .put(`/api/question/${this.$route.params.id}`, this.question)
                    .then((response) => {
                        if (response.data.success === false) {
                            this.errors = response.data.data;
                            console.log(response.data.data);
                        } else {
                            this.$router.push({ name: "home" });
                        }
                    });
            }
        }
    }
</script>