<template>
  <q-layout style="background-color: #f8f8fb">
    <q-page-container class="page-wrapper">
      <q-page padding class="page flex column justify-center q-pt-none">
        <div class="row justify-between items-center q-mb-sm">
          <span class="text-h6 text-weight-bold">HipsterNews</span>
        </div>
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
                  <JokesSection />
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
import PostsSection from "./components/PostsSection.vue";
import NewsSection from "./components/NewsSection.vue";
import CryptoSection from "./components/CryptoSection.vue";
import JokesSection from "./components/JokesSection.vue";

defineComponent({ PostsSection, NewsSection, CryptoSection });

const mainSplitter = ref(50);
const postsNewsSplitter = ref(50);
const cryptoMoviesSplitter = ref(50);
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
