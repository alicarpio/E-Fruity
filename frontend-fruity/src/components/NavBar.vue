<template>
  <nav class="navbar">
    <div class="navbar-brand">
      <a class="navbar-item" href="#">
        E-Fruity
      </a>
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="text" placeholder="Search" v-model="searchQuery" @input="onSearch" />
            <span class="icon is-left">
              <i class="fas fa-search"></i>
            </span>
          </p>
        </div>
      </div>
    </div>
  </nav>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';

export default defineComponent({
  name: 'NavBar',
  setup() {
    const searchQuery = ref('');

    const onSearch = () => {
      console.log('Search query:', searchQuery.value);
    };

    return {
      searchQuery,
      onSearch,
    };
  },
});
</script>

<style scoped>
.navbar {
  background-color: #f8f9fa;
  padding: 1rem;
}

.navbar-item {
  font-size: 1.5rem;
}

.input {
  max-width: 300px;
}
</style>
