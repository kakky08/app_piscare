<template>
    <div class="mb-12 mx-12">
  <carousel
    autoplay="true"
    loop="true"
    :per-page="2"
    :navigation-enabled="true"
    navigation-prev-label="〈"
    navigation-next-label="〉"
    :speed="1000"
    >
    <slide v-for="latest in latests" :key="latest.id" class="space-x-1">
        <div class="w-90 mx-auto max-w-sm overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <a href="">
                <img v-if="latest.image" class="object-cover object-center w-full h-56" :src="'https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/' + latest.image " :alt="latest.title + 'の画像'">
                <img v-else class="object-cover object-center w-full h-56" :src="defaultImage" :alt="latest.title + 'の画像'">

                <div class="flex items-center px-6 py-3 bg-yellow-300">
                    <h2 class="mx-3 text-lg font-semibold text-gray-700">{{ latest.title }}</h2>
                </div>
            </a>
        </div>
    </slide>
  </carousel>
</div>
        <!-- <div v-for="n in 5" :key="n">
            <div class="w-80 h-80 bg-green-300">

            </div>
        </div> -->
        <!-- <div v-for="latest in latests" :key="latest.id" class="mx-auto">
            <div class="w-90 mr-20 mx-auto  max-w-sm overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <img class="object-cover object-center w-full h-56" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">

                <div class="flex items-center px-6 py-3 bg-gray-900">
                    <h2 class="mx-3 text-lg font-semibold text-white">{{ latest.title }}</h2>
                </div>
            </div>
        </div> -->

</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
export default {
    components: {
        Carousel,
        Slide
    },
  props:{
    latests: JSON,
    defaultImage: String
  },
  data: {
    flickityOptions: {
      "autoPlay": 1500,
      "pageDots": true,
      "resize": true,
      "prevNextButtons": true,
      "wrapAround": true,
    },
    api: {},
  },
  methods: {
    dragMove(event, pointer, moveVector) {
      console.log(event, pointer, moveVector);
    },
  }
}
</script>
