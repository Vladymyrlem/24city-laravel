<template>
    <input type="hidden" name="selectedCategories" :value="selectedCategoryIdsString">
    <h1>Вибір категорії</h1>
    <Select v-model="selectedCategory" :options="categories" :multiple="true" label="name" @input="onCategorySelect"></Select>

</template>

<script>
import axios from 'axios';
import Select from 'vue3-select'

export default {
    name: "SelectCategory",
    components: {
        Select
    },
    emits: ['select', 'input', 'update:model-value'], // Додаємо подію "select" до опції emits

    data() {
        return {
            selectedCategory: [],
            categories: [],
        };
    },
    computed: {
        selectedCategoryIdsString() {
            // Створюємо масив ідентифікаторів категорій
            const selectedIds = this.selectedCategory.map(category => category.id);
            // Об'єднуємо їх у рядок з комами
            return selectedIds.join(',');
        }
    },
    created() {
        // Завантажити список категорій з сервера
        axios.get('http://24city.laravel/api/company_categories')
            .then(response => {
                this.categories = response.data;
            })
            .catch(error => {
                console.error('Помилка завантаження категорій:', error);
            });
    },
    onCategorySelect() {
        const selectedValuesString = JSON.stringify(this.selectedCategory);

        console.log('Selected Categories:', this.selectedCategory);
        axios.post('http://24city.laravel/api/store', {selectedValues: selectedValuesString})
            .then(response => {
                this.selectedCategory = response.data;
            })
            .catch(error => {
                console.error('Помилка при відправленні категорій:', error);
            });
    },
    getCategoryWithIndent(category) {
        const indent = this.getIndent(category);
        return `${indent}${category.name}`;
    },
    getIndent(category) {
        let indent = '';
        let parent = category;
        while (parent.parent_id !== null) {
            indent += '   '; // Додавайте відступи для кожного рівня
            parent = this.getParentCategory(parent.parent_id);
        }
        return indent;
    },
    getParentCategory(parentId) {
        return this.categories.find(category => category.id === parentId);
    },
    methods: {
        formatCategory(category) {
            return category.name; // Відображати ім'я категорії
        },
        myChangeEvent(val) {
            console.log(val);
        },
        mySelectEvent({id, name}) {
            console.log({id, name})
        },
        onCategorySelect() {
            const selectedValuesString = JSON.stringify(this.selectedCategory);

            console.log('Selected Categories:', this.selectedCategory);
            axios.post('http://24city.laravel/api/store', {selectedValues: selectedValuesString})
                .then(response => {
                    this.selectedCategory = response.data;
                })
                .catch(error => {
                    console.error('Помилка при відправленні категорій:', error);
                });
        },
    },
};
</script>

<style scoped>

</style>
