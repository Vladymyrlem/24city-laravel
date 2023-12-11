<template>
    <div>
        <button @click="addLink" type="button">Додати</button>

        <!-- Повторювач -->
        <div v-for="(link, index) in links" :key="index" class="link-item">
            <input v-model="link.url" type="text" name="connectivity_link[]" placeholder="http://www.example.com"/>
            <select v-model="link.messenger" name="connectivity_type[]">
                <option value="">- Выбрать -</option>
                <option value="ICQ">ICQ</option>
                <option value="Skype">Skype</option>
                <option value="Другие">Другие</option>
            </select>
            <button type="button" @click="deleteLink(index)">Видалити</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Connectivity Lists',
    data() {
        return {
            links: [
                {
                    url: '',
                    messenger: 'ICQ'
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
