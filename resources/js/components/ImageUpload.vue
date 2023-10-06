<template>
    <div>
        <input type="file" name="image" @change="handleFileUpload" accept="image/*">
        <img v-if="previewUrl" :src="previewUrl" alt="Preview">
        <input type="hidden" name="thumb_url" v-model="imageUrl">
    </div>
</template>

<script>
export default {
    data() {
        return {
            previewUrl: null,
            imageUrl: null,
            selectedFile: null,
        };
    },
    methods: {
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const file = event.target.files[0];
                const formData = new FormData();
                formData.append('file', file);

                axios.post('http://24city-laravel/api/upload-image', formData)
                    .then(response => {
                        // Отримайте URL з відповіді та призначте його змінній imageUrl
                        this.imageUrl = response.data.location;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        },
    },
};
</script>
