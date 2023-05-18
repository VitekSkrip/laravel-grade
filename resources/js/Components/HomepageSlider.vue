<template>
    <div>
        <div class="mx-auto text-center z-10 relative">
            <ssr-carousel :slides-per-page='1' :autoplay-delay='3' show-arrows show-dots onclick="event.preventDefault()">
                <div class="relative banner">
                    <slide :index='1'>
                        <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src='assets/pictures/test_banner_2.jpg'>
                            <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                                <h2 class="text-gray-300 italic text-4xl xl:text-3xl font-bold">Мы живем автомобилями - живите и Вы! </h2>
                                <p class="mb-8 text-lg text-gray-300 lg:text-xl sm:px-16 lg:px-48">Выбирайте модели машин в соответствие с Вашими вкусами</p>
                            </div>
                        </div>
                    </slide>
                </div>
                <div class="relative banner">
                    <slide :index='2'>
                        <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src='assets/pictures/test_banner_1.jpg'>
                            <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                                <h2 class="text-gray-300 italic text-4xl xl:text-3xl font-bold">Мы живем авто-новостями - живите и Вы!</h2>
                                <p class="mb-8 text-lg text-gray-300 lg:text-xl sm:px-16 lg:px-48">Будьте в курсе всех самых актуальных новостей из авто-мира</p>
                            </div>
                        </div>
                    </slide>
                </div>
                <div class="relative banner">
                    <slide :index='3'>
                        <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src='assets/pictures/test_banner_3.jpg'>
                            <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                                <h2 class="text-gray-300 italic text-4xl xl:text-3xl font-bold">Мы покупаем автомобили - покупайте и Вы! </h2>
                                <p class="mb-8 text-lg text-gray-300 lg:text-xl sm:px-16 lg:px-48">Оформляйте предзаказы, тестдрайвы и многое другое</p>
                            </div>
                        </div>
                    </slide>
                </div>
            </ssr-carousel>
            </div>
    </div>
</template>

<script>
import SsrCarousel from "vue-ssr-carousel";

export default {
    components: { SsrCarousel }
}
</script>

