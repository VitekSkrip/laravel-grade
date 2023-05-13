<template>
    <div>
        <div class="py-8 lg:py-10 px-4 mx-auto max-w-screen-md">
            <div class="grid grid-cols-1 gap-6">
                <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-center text-black font-bold">Выбор модели и салона</h2>
                <div class="block">
                    <label class="text-gray-700 font-bold">Модель</label>
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
                    <label class="text-gray-700 font-bold">Салон</label>
                    <div class="mt-1">
                        <select v-model="selectedSalon" v-on:change="selectedFullSalon = findSalonById(selectedSalon)" name="salon_id" class="focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full border-gray-300">
                            <option v-for="salon in this.salons"
                                    :value="salon.id"
                            >
                                {{ salon.name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-2 grid grid-cols-1 gap-1 justify-content-center items-center">
                <template v-if="selectedFullCar.name">
                    <img class="" :src=" 'storage/' + selectedFullCar.image.path" :alt="selectedFullCar.name">
                        <div class="block">
                            <label for="testDriveSalonWorkHours" class="text-black font-bold border-gray-300">Модель: <i class="text-gray-800">{{ selectedFullCar.name }}</i> </label>
                        </div>
                        <div class="block">
                            <label for="testDriveSalonWorkHours" class="text-black font-bold">Цвет: <i class="text-gray-800">{{ selectedFullCar.color }}</i> </label>
                        </div>
                        <div class="block">
                            <label for="testDriveSalonWorkHours" class="text-black font-bold">Год: <i class="text-gray-800">{{ selectedFullCar.year }}</i> </label>
                        </div>
                        <div class="block">
                            <label for="testDriveSalonAddress" class="text-black font-bold">Цена: <i class="text-gray-800">{{ selectedFullCar.price + ' ₽'}}</i> </label>
                        </div>
                </template>
                <template v-if="selectedFullSalon.name">
                        <div class="block">
                            <label for="testDriveSalonAddress" class="text-black font-bold">Адресс: <i class="text-gray-800">{{ selectedFullSalon.address}}</i> </label>
                        </div>
                        <div class="block">
                            <label for="testDriveSalonPhone" class="text-black font-bold">Телефон: <i class="text-gray-800">{{ selectedFullSalon.phone }}</i> </label>
                        </div>
                        <div class="block">
                            <label for="testDriveSalonWorkHours" class="text-black font-bold">Часы работы: <i class="text-gray-800">{{ selectedFullSalon.work_hours }}</i> </label>
                        </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: {
        cars: Array,
        oldCar: {
            type: Number | String,
            required: false
        },
        oldSalon: {
            type: Number | String,
            required: false
        },
        testDrive: {
            type: Object | Array,
            required: false,
            car: {
                type: Object | Array,
                required: false,
            }
        }
    },
    data() {
        return {
            selectedCar: this.oldCar,
            selectedSalon: this.oldSalon,
            selectedFullSalon: {},
            selectedFullCar: {
                image: {
                    path: String
                }
            },
            salons: {}
        }
    },
    methods: {
        changeSalonsList(id) {
            this.selectedFullCar = this.findCarById(id);
            this.salons = this.selectedFullCar.salons;
            this.selectedFullSalon = {};
        },
        findCarById(id) {
            return this.cars.find(x => x.id === id);
        },
        findSalonById(id) {
            return this.salons.find(x => x.id === id);
        },
    }
}
</script>
