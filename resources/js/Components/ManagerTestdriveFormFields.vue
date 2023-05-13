<template>
    <div>
        <div class="block">
            <label for="testDriveCarId" class="text-gray-700 font-bold">Модель</label>
            <div class="mt-1">
                <select v-model="selectedCar" v-on:change="changeSalonsList(selectedCar)" name="car_id" class="focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full border-gray-300">
                    <option v-for="car in cars"
                            :value="car.id"
                    >
                        {{ car.name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="block">
            <label for="testDriveSalonId" class="text-gray-700 font-bold">Салон</label>
            <div class="mt-1">
                <select v-model="selectedSalonId" v-on:change="selectedSalon = findSalonById(selectedSalonId)" name="salon_id" class="focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full border-gray-300">
                    <option v-for="salon in this.salons"
                            :value="salon.id"
                    >
                        {{ salon.name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="block">
            <label for="testDriveSalonAddress" class="text-gray-700">Адресс салона</label>
            <div class="mt-1">
                <input readonly name="salon_address" :value="selectedSalon.address" class="focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full border-gray-300">
            </div>
        </div>
        <div class="block">
            <label for="testDriveSalonPhone" class="text-gray-700">Телефон</label>
            <div class="mt-1">
                <input readonly name="salon_phone" :value="selectedSalon.phone" class="focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full border-gray-300">
            </div>
        </div>
        <div class="block">
            <label for="testDriveSalonWorkHours" class="text-gray-700">Часы работы</label>
            <div class="mt-1">
                <input readonly name="salon_work_hours" :value="selectedSalon.work_hours" class="focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full border-gray-300">
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ['testDrive', 'cars'],
    data() {
        return {
            selectedCar: this.testDrive.car.id,
            selectedSalonId: this.testDrive.salon.id,
            salons: this.testDrive.car.salons,
            selectedSalon: this.testDrive.salon
        }
    },
    methods: {
        changeSalonsList(id) {
            this.salons = this.findCarById(id).salons;
            this.selectedSalon = {}
        },
        findCarById(id) {
            return this.cars.find(x => x.id === id);
        },
        findSalonById(id) {
            return this.salons.find(x => x.id === id);
        }
    },
}
</script>

