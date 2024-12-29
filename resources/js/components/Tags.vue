<template>
    <div>
        <select v-model="selectedTag" @change="addNewTag" multiple>
            <option value="">Виберіть тег</option>
            <option v-for="tag in tags" :key="tag.id" :value="tag.id">{{ tag.name }}</option>
            <option value="new">Додати новий тег</option>
        </select>

        <input v-model="newTagName" @keyup.enter="createNewTag" placeholder="Додати новий тег">
    </div>
</template>

<script>
export default {
    name: 'Tags',
    data() {
        return {
            selectedTag: '',
            newTagName: '',
            tags: [], // Масив для збереження тегів
        };
    },
    methods: {
        addNewTag() {
            if (this.selectedTag === 'new') {
                // Вибрано "Додати новий тег", обробка за вашою логікою
                console.log('Створено новий тег: ' + this.newTagName);
                this.createNewTagViaApi(); // Додати новий тег через API
            }
        },
        createNewTag() {
            if (this.newTagName) {
                // Додати новий тег до списку і обнулити поле для нового тегу
                this.createNewTagViaApi();
            }
        },
        createNewTagViaApi() {
            axios.post('https://testwork.hudzhal.com.ua/api/tags', {name: this.newTagName})
                .then(response => {
                    this.tags.push(response.data);
                    this.selectedTag = response.data.id;
                    this.newTagName = '';
                })
                .catch(error => {
                    console.error(error);
                });
        },
        fetchTags() {
            axios.get('https://testwork.hudzhal.com.ua/api/tags')
                .then(response => {
                    this.tags = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
    },
    mounted() {
        this.fetchTags(); // Отримати список тегів під час завантаження компонента
    },
};
</script>
