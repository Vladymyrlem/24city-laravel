<template>
    <div>
        <button @click="openModal" id="openAddressModal" class="btn btn-success">Додати адресу</button>

        <!-- Модальне вікно -->
        <div v-show="isModalOpen" class="modal fade" id="address-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <h2>Додати адресу</h2>
                    <input v-model="streetName" name="address[]" type="text" placeholder="Назва вулиці"/>
                    <input v-model="mapLink" name="google_link[]" placeholder="Посилання на Google Карту"/>
                    <button @click="addAddress">Додати</button>
                    <button @click="closeModal">Закрити</button>
                </div>
            </div>
        </div>

        <!-- Список адрес -->
        <div>
            <div v-for="(address, index) in addresses" :key="index" class="address-item">
                <p>{{ address.streetName }}</p>
                <a :href="address.mapLink" target="_blank">Посилання на карту</a>
                <button @click="deleteAddress(index)">Видалити</button>
            </div>
        </div>
    </div>
</template>

<script>
$(document).ready(function () {

    jQuery('#openAddressModal').click(function () {

        jQuery('#address-modal').modal('show');
    });
});
export default {
    data() {
        return {
            isModalOpen: false,
            streetName: '',
            mapLink: '',
            addresses: []
        };
    },
    methods: {
        openModal() {
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
        },
        addAddress() {
            if (this.streetName && this.mapLink) {
                const newAddress = {
                    streetName: this.streetName,
                    mapLink: this.mapLink
                };
                this.addresses.push(newAddress);
                this.streetName = '';
                this.mapLink = '';
                this.closeModal();
            }
        },
        deleteAddress(index) {
            this.addresses.splice(index, 1);
        }
    }
};
</script>

<style>
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
</style>
