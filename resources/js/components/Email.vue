<template>
    <div>
        <button type="button" @click="isModalOpen = true" id="openModal" class="btn btn-success">Додати</button>

        <!-- Модальне вікно -->
        <div v-show="isModalOpen" class="modal fade" id="email-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <h2 class="mb-3">Додати пошту</h2>
                    <div class="input-group">
                        <input class="input-group-text" v-model="email" type="email" placeholder="Адреса пошти"/>
                    </div>
                    <div class="input-group">
                        <input v-model="emailText" type="text" class="input-group-text" placeholder="Текст для пошти">
                    </div>
                    <button @click="addEmail" class="btn btn-success">Додати</button>
                    <button @click="closeModal" class="btn btn-close">Закрити</button>
                </div>
            </div>
        </div>

        <!-- Список пошти -->
        <div class="list-group">
            <div v-for="(email, index) in emails" :key="index" class="email-item list-group-item row">
                <a :href="'mailto:' + email.address" class="col-md-9">{{ email.text }}</a>
                <button @click="deleteEmail(index)" class="col-md-3 btn btn-danger">Видалити</button>
            </div>
        </div>
    </div>
</template>

<script>
$(document).ready(function () {

    jQuery('#openModal').click(function () {

        jQuery('#email-modal').modal('show');
    });
});
export default {
    data() {
        return {
            isModalOpen: false,
            email: '',
            emailText: '',
            emails: []
        };
    },
    methods: {
        openModal(event) {
            event.preventDefault();
            jQuery('#email-modal').modal('show');
            this.isModalOpen = true;
        },
        closeModal(event) {
            event.preventDefault();
            jQuery('#email-modal').modal('hide');
            this.isModalOpen = false;
        },
        addEmail(event) {
            event.preventDefault();

            if (this.email && this.emailText) {
                const newEmail = {
                    address: this.email,
                    text: this.emailText
                };
                this.emails.push(newEmail);
                this.email = '';
                this.emailText = '';
                jQuery('#email-modal').modal('hide');

            }
        },
        deleteEmail(index, event) {
            this.emails.splice(index, 1);
        }
    }
};
</script>

<style>
/* Стилі для модального вікна */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    justify-content: center;
    align-items: center;
    z-index: 999999;
}


.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Стилі для посилань на пошту та кнопок видалення */
.email-item {
    display: flex;
    align-items: center;
    margin-top: 10px;
}

.email-link {
    text-decoration: none;
    color: #333;
    margin-right: 10px;
}

/* Стилі для кнопок видалення */
button.delete-mail {
    background-color: #ff0000;
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
}
</style>
