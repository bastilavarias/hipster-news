<template>
  <q-layout>
    <q-page-container class="page-wrapper">
      <q-page padding class="q-pt-none">
        <div>
          <q-splitter v-model="splitterModel" style="height: 400px">
            <template v-slot:before>
              <div class="q-pa-md">
                <div class="text-h4 q-mb-md">Posts</div>
                <div v-for="n in 20" :key="n" class="q-my-md">
                  {{ n }}. Lorem ipsum dolor sit, amet consectetur adipisicing
                  elit. Quis praesentium cumque magnam odio iure quidem, quod
                  illum numquam possimus obcaecati commodi minima assumenda
                  consectetur culpa fuga nulla ullam. In, libero.
                </div>
              </div>
            </template>

            <template v-slot:after>
              <q-splitter v-model="insideModel" horizontal>
                <template v-slot:before>
                  <div class="q-pa-md">
                    <div class="text-h4 q-mb-md">News</div>
                    <div v-for="n in 20" :key="n" class="q-my-md">
                      {{ n }}. Lorem ipsum dolor sit, amet consectetur
                      adipisicing elit. Quis praesentium cumque magnam odio iure
                      quidem, quod illum numquam possimus obcaecati commodi
                      minima assumenda consectetur culpa fuga nulla ullam. In,
                      libero.
                    </div>
                  </div>
                </template>

                <template v-slot:after>
                  <div class="q-pa-md">
                    <div class="text-h4 q-mb-md">Crypto</div>
                    <div v-for="n in 20" :key="n" class="q-my-md">
                      {{ n }}. Lorem ipsum dolor sit, amet consectetur
                      adipisicing elit. Quis praesentium cumque magnam odio iure
                      quidem, quod illum numquam possimus obcaecati commodi
                      minima assumenda consectetur culpa fuga nulla ullam. In,
                      libero.
                    </div>
                  </div>
                </template>
              </q-splitter>
            </template>
          </q-splitter>
        </div>

        <div>
          <q-splitter v-model="splitterModel" style="height: 400px">
            <template v-slot:before>
              <div class="q-pa-md">
                <div class="text-h4 q-mb-md">Posts</div>
                <div v-for="n in 20" :key="n" class="q-my-md">
                  {{ n }}. Lorem ipsum dolor sit, amet consectetur adipisicing
                  elit. Quis praesentium cumque magnam odio iure quidem, quod
                  illum numquam possimus obcaecati commodi minima assumenda
                  consectetur culpa fuga nulla ullam. In, libero.
                </div>
              </div>
            </template>

            <template v-slot:after>
              <q-splitter v-model="insideModel" horizontal>
                <template v-slot:before>
                  <div class="q-pa-md">
                    <div class="text-h4 q-mb-md">News</div>
                    <div v-for="n in 20" :key="n" class="q-my-md">
                      {{ n }}. Lorem ipsum dolor sit, amet consectetur
                      adipisicing elit. Quis praesentium cumque magnam odio iure
                      quidem, quod illum numquam possimus obcaecati commodi
                      minima assumenda consectetur culpa fuga nulla ullam. In,
                      libero.
                    </div>
                  </div>
                </template>

                <template v-slot:after>
                  <div class="q-pa-md">
                    <div class="text-h4 q-mb-md">Crypto</div>
                    <div v-for="n in 20" :key="n" class="q-my-md">
                      {{ n }}. Lorem ipsum dolor sit, amet consectetur
                      adipisicing elit. Quis praesentium cumque magnam odio iure
                      quidem, quod illum numquam possimus obcaecati commodi
                      minima assumenda consectetur culpa fuga nulla ullam. In,
                      libero.
                    </div>
                  </div>
                </template>
              </q-splitter>
            </template>
          </q-splitter>
        </div>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { defineComponent, ref } from "vue";
import ServiceStatusToolbar from "./components/ServiceStatusToolbar.vue";
import CryptoPriceSection from "./components/CryptoPriceSection.vue";

defineComponent({
  ServiceStatusToolbar,
  CryptoPriceSection,
});

const splitterModel = ref(50);
const insideModel = ref(50);
</script>

<style scoped>
.page-wrapper {
  max-width: 992px;
  margin-left: auto;
  margin-right: auto;
}
</style>
