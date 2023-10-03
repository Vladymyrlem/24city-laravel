<template>
    <div>
        <button @click="addLink" type="button">Додати</button>

        <!-- Повторювач -->
        <div v-for="(link, index) in links" :key="index" class="link-item">
            <input v-model="link.url" type="text" name="social_link[]" placeholder="http://www.example.com"/>
            <select v-model="link.messenger" name="social_type[]">
                <option value="Выберите соцсеть">Выберите соцсеть</option>
                <option value="Facebook">Facebook</option>
                <option value="Twitter">Twitter</option>
                <option value="Instagram">Instagram</option>
                <option value="VKontakte">VKontakte</option>
                <option value="Youtube">Youtube</option>
            </select>
            <button type="button" @click="deleteLink(index)">Видалити</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            links: [
                {
                    url: '',
                    messenger: 'Skype'
                }
            ]
        };
    },
    methods: {
        addLink(event) {
            event.preventDefault();
            this.links.push({
                url: '',
                messenger: 'Skype'
            });
        },
        deleteLink(index) {
            this.links.splice(index, 1);
        }
    }
};
</script>

<style>
/* Стилі для повторювача та інше */
/* ... */
</style>
