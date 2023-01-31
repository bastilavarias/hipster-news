<template>
  <q-layout style="background-color: #f8f8fb">
    <q-page-container class="page-wrapper">
      <q-page padding class="page flex items-center">
        <q-card class="full-width" style="height: 90vh">
          <q-splitter
            class="full-height overflow-hidden"
            v-model="mainSplitter"
          >
            <template v-slot:before>
              <q-splitter horizontal v-model="postsNewsSplitter">
                <template v-slot:before>
                  <PostsSection />
                </template>

                <template v-slot:after>
                  <NewsSection />
                </template>
              </q-splitter>
            </template>

            <template v-slot:after>
              <q-splitter horizontal v-model="cryptoMoviesSplitter">
                <template v-slot:before>
                  <CryptoSection />
                </template>

                <template v-slot:after>
                  <q-splitter horizontal v-model="moviesAuthStatusSplitter">
                    <template v-slot:before>
                      <div class="q-pa-md">
                        <div class="text-h4 q-mb-md text-weight-bold">
                          Movies
                        </div>
                      </div>
                    </template>

                    <template v-slot:after>
                      <q-splitter v-model="authStatusSplitter">
                        <template v-slot:before>
                          <div class="q-pa-md">
                            <div class="text-h5 q-mb-md text-weight-bold">
                              Authentication
                            </div>
                          </div>
                        </template>

                        <template v-slot:after>
                          <div class="q-pa-md">
                            <div class="text-h5 q-mb-md text-weight-bold">
                              Status
                            </div>
                          </div>
                        </template>
                      </q-splitter>
                    </template>
                  </q-splitter>
                </template>
              </q-splitter>
            </template>
          </q-splitter>
        </q-card>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { defineComponent, ref } from "vue";
import PostsSection from "./components/PotsSection.vue";
import NewsSection from "./components/NewsSection.vue";
import CryptoSection from "./components/CryptoSection.vue";

defineComponent({ PostsSection, NewsSection, CryptoSection });

const mainSplitter = ref(40);
const postsNewsSplitter = ref(50);
const cryptoMoviesSplitter = ref(40);
const moviesAuthStatusSplitter = ref(50);
const authStatusSplitter = ref(50);
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap");

.page-wrapper {
  max-width: 1024px;
  margin-left: auto;
  margin-right: auto;
}

.page {
  font-family: "Poppins", sans-serif;
}

.rounded-borders {
  border-radius: 10px !important;
}
</style>
