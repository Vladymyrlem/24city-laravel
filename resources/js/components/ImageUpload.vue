<template>
    <div>
        <input type="file" @change="uploadImage" accept="image/*">

        <div v-for="image in images" :key="image.id">
            <img :src="image.image_path" alt="Зображення">
        </div>
    </div>
</template>

<script>
export default {
    name: 'Company Thumbnail',
    data() {
        return {
            images: [], // Масив для збереження зображень
        };
    },
    methods: {
        uploadImage(event) {
            const formData = new FormData();
            formData.append('image', event.target.files[0]);

            axios.post('/api/images', formData)
                .then(response => {
                    console.log(response.data.message);
                    this.fetchImages(); // Оновити список зображень
                })
                .catch(error => {
                    console.error(error);
                });
        },
        fetchImages() {
            axios.get('https://testwork.hudzhal.com.ua/api/images')
                .then(response => {
                    this.images = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
    },
    mounted() {
        this.fetchImages(); // Отримати список зображень під час завантаження компонента
    },
};
</script>
