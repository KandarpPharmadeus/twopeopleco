<template>
  <div>
    <h3 class="text-center">Create a question</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addQuestion">
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
          <button type="submit" class="btn btn-primary">Add Question</button>
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
    };
  },
  methods: {
    addQuestion() {
      this.axios
        .post("/api/question", this.question)
        .then((response) => {
          console.log(response.data.success);
          if (response.data.success === false) {
              this.errors = response.data.data;
            console.log(response.data.data);
          } else {
            this.$router.push({ name: "home" });
          }
          // console.log(response.data)
        })
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
  },
};
</script>