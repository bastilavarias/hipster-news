<template>
  <q-carousel
    v-model="slide"
    transition-prev="slide-right"
    transition-next="slide-left"
    swipeable
  >
    <q-carousel-slide :name="1" class="column no-wrap">
      <div
        class="row fit justify-start items-center q-gutter-xs q-col-gutter no-wrap"
      >
        <template v-for="n in 3" :key="n">
          <q-card class="rounded-borders col-4" flat bordered>
            <q-card-section horizontal>
              <q-card-section class="q-pt-xs">
                <div class="text-overline text-weight-bold">BTC</div>
                <div class="text-h5 q-mt-sm q-mb-xs">$23,000</div>
                <div class="text-caption text-grey">Bitcoin</div>
              </q-card-section>

              <q-card-section class="col-5 flex flex-center">
                <q-img
                  class="rounded-borders"
                  src="https://cdn.quasar.dev/img/parallax2.jpg"
                />
              </q-card-section>
            </q-card-section>
          </q-card>
        </template>
      </div>
    </q-carousel-slide>
  </q-carousel>
</template>

<script>
export default {
  name: "CryptoPriceSection",
};
</script>

<script setup>
import { ref } from "vue";
import TestCrpytoImage from "../assets/TestCrypto.webp";

const slide = ref(0);
</script>
