<template>
          <div
            v-if="Object.keys(errors).length > 0"
            class="
              alert alert-danger
            "
          >
            <div v-for="(v, k) in errors" :key="k">
              <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
              </p>
            </div>
          </div>
          
</template>
  
<script>
export default {
    props: [
        'errors'
    ],
  data() {
    return {
    };
  },
};
</script>