<!-- resources/js/components/MenuItems.vue -->
<template>
  <div>
    <h3>Menu Items</h3>
    <ul>
      <li v-for="item in items" :key="item.id">{{ item.name }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [
        { id: 1, name: 'Item 1' },
        { id: 2, name: 'Item 2' },
        { id: 3, name: 'Item 3' }
      ]
    };
  }
};
</script>

<style scoped>
/* Додаткові стилі для компонента */
</style>
