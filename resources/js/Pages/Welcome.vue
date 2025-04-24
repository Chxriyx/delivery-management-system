<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
  pickup_address: '',
  pickup_name: '',
  pickup_contact: '',
  pickup_email: '',
  delivery_address: '',
  delivery_name: '',
  delivery_contact: '',
  delivery_email: '',
  type_of_good: '',
  delivery_provider: '',
  priority: '',
  pickup_date: '',
  pickup_time: '',
  package_description: '',
  length: '',
  height: '',
  width: '',
  weight: ''
})

function submitForm() {
    router.post('/delivery-form', form)
    .then(response => {
      alert('Delivery created successfully!')
      console.log(response.data)
    })
    .catch(error => {
      console.error(error)
      alert('Error submitting form')
    })
}
</script>

<template>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-xl shadow mt-5">
      <h2 class="text-2xl font-bold mb-4">Delivery Information</h2>
  
      <form @submit.prevent="submitForm">
        <!-- Pickup Info -->
        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-2">Pickup Details</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input v-model="form.pickup_address" type="text" placeholder="Pickup Address" class="input" />
            <input v-model="form.pickup_name" type="text" placeholder="Pickup Name" class="input" />
            <input v-model="form.pickup_contact" type="text" placeholder="Pickup Contact No." class="input" />
            <input v-model="form.pickup_email" type="email" placeholder="Pickup Email" class="input" />
          </div>
        </div>
  
        <!-- Delivery Info -->
        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-2">Delivery Details</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input v-model="form.delivery_address" type="text" placeholder="Delivery Address" class="input" />
            <input v-model="form.delivery_name" type="text" placeholder="Delivery Name" class="input" />
            <input v-model="form.delivery_contact" type="text" placeholder="Delivery Contact No." class="input" />
            <input v-model="form.delivery_email" type="email" placeholder="Delivery Email" class="input" />
          </div>
        </div>
  
        <!-- Shipment Info -->
        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-2">Shipment Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <select v-model="form.type_of_good" class="input">
              <option disabled value="">Select Type of Good</option>
              <option>Document</option>
              <option>Parcel</option>
            </select>
            <select v-model="form.delivery_provider" class="input">
              <option disabled value="">Select Delivery Provider</option>
              <option>DEHL</option>
              <option>STARTRACK</option>
              <option>ZOOM2U</option>
              <option>TGE</option>
            </select>
            <select v-model="form.priority" class="input">
              <option disabled value="">Select Priority</option>
              <option>Standard</option>
              <option>Express</option>
              <option>Immediate</option>
            </select>
            <input v-model="form.pickup_date" type="date" class="input" />
            <input v-model="form.pickup_time" type="time" class="input" />
          </div>
        </div>
  
        <!-- Package Info -->
        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-2">Package Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input v-model="form.package_description" type="text" placeholder="Package Description" class="input" />
            <input v-model="form.length" type="number" placeholder="Length (cm)" class="input" />
            <input v-model="form.height" type="number" placeholder="Height (cm)" class="input" />
            <input v-model="form.width" type="number" placeholder="Width (cm)" class="input" />
            <input v-model="form.weight" type="number" placeholder="Weight (kg)" class="input" />
          </div>
        </div>
  
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Submit</button>
      </form>
      <a href="/deliveries">Delivery Requests</a>
    </div>
  </template>

  