<template>
    <vue-multi-image-upload
        @data-image="images"
        :max="4"
        :image-size="4e6"
        :alert-timeout="3e3"
        :accept="imageType"
        :preview="{ h:100,w:100 }"
        :resize="{ h:500,w:500, keepRatio:true}"
        :data-reset="component"
        :options="options"
    />
    <button @click="clear()">Clear</button>
</template>

<script>

import {VueMultiImageUpload} from '@zakerxa/vue-multiple-image-upload';

export default {
    name: 'Gallery',
    data() {
        return {
            component: {},
            inputImages: [],
            imageType: ['image/jpeg', 'image/png', 'image/gif']
        }
    },
    components: {
        'vue-multi-image-upload': VueMultiImageUpload
    },
    methods: {
        images(e) {
            this.inputImages = e;
        },
        inputFormData() {
            // The way to append images to FormData.
            let formData = new FormData();
            this.inputImages.map(img => formData.append('images[]', img));
            return formData;
        },
        clear() {
            this.component.clear = true;
        }
    }
}
</script>
