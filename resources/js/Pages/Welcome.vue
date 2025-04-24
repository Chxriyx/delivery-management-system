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

const errors = reactive({})

function submitForm() {
  router.post('/delivery-form', form, {
    onError: (err) => {
      Object.assign(errors, err)
    },
    onSuccess: () => {
      alert('Delivery created successfully!')
      Object.keys(form).forEach(key => form[key] = '')
      Object.keys(errors).forEach(key => delete errors[key])
    }
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
          <div>
            <input v-model="form.pickup_address" type="text" placeholder="Pickup Address"
              :class="['input', errors.pickup_address ? 'border-red-500' : '']" />
            <p v-if="errors.pickup_address" class="text-red-600 text-sm mt-1">{{ errors.pickup_address }}</p>
          </div>

          <div>
            <input v-model="form.pickup_name" type="text" placeholder="Pickup Name"
              :class="['input', errors.pickup_name ? 'border-red-500' : '']" />
            <p v-if="errors.pickup_name" class="text-red-600 text-sm mt-1">{{ errors.pickup_name }}</p>
          </div>

          <div>
            <input v-model="form.pickup_contact" type="text" placeholder="Pickup Contact No."
              :class="['input', errors.pickup_contact ? 'border-red-500' : '']" />
            <p v-if="errors.pickup_contact" class="text-red-600 text-sm mt-1">{{ errors.pickup_contact }}</p>
          </div>

          <div>
            <input v-model="form.pickup_email" type="email" placeholder="Pickup Email"
              :class="['input', errors.pickup_email ? 'border-red-500' : '']" />
            <p v-if="errors.pickup_email" class="text-red-600 text-sm mt-1">{{ errors.pickup_email }}</p>
          </div>
        </div>
      </div>

      <!-- Delivery Info -->
      <div class="mb-6">
        <h3 class="text-lg font-semibold mb-2">Delivery Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <input v-model="form.delivery_address" type="text" placeholder="Delivery Address"
              :class="['input', errors.delivery_address ? 'border-red-500' : '']" />
            <p v-if="errors.delivery_address" class="text-red-600 text-sm mt-1">{{ errors.delivery_address }}</p>
          </div>

          <div>
            <input v-model="form.delivery_name" type="text" placeholder="Delivery Name"
              :class="['input', errors.delivery_name ? 'border-red-500' : '']" />
            <p v-if="errors.delivery_name" class="text-red-600 text-sm mt-1">{{ errors.delivery_name }}</p>
          </div>

          <div>
            <input v-model="form.delivery_contact" type="text" placeholder="Delivery Contact No."
              :class="['input', errors.delivery_contact ? 'border-red-500' : '']" />
            <p v-if="errors.delivery_contact" class="text-red-600 text-sm mt-1">{{ errors.delivery_contact }}</p>
          </div>

          <div>
            <input v-model="form.delivery_email" type="email" placeholder="Delivery Email"
              :class="['input', errors.delivery_email ? 'border-red-500' : '']" />
            <p v-if="errors.delivery_email" class="text-red-600 text-sm mt-1">{{ errors.delivery_email }}</p>
          </div>
        </div>
      </div>

      <!-- Shipment Info -->
      <div class="mb-6">
        <h3 class="text-lg font-semibold mb-2">Shipment Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <select v-model="form.type_of_good" :class="['input', errors.type_of_good ? 'border-red-500' : '']">
              <option disabled value="">Select Type of Good</option>
              <option>Document</option>
              <option>Parcel</option>
            </select>
            <p v-if="errors.type_of_good" class="text-red-600 text-sm mt-1">{{ errors.type_of_good }}</p>
          </div>

          <div>
            <select v-model="form.delivery_provider" :class="['input', errors.delivery_provider ? 'border-red-500' : '']">
              <option disabled value="">Select Delivery Provider</option>
              <option>DEHL</option>
              <option>STARTRACK</option>
              <option>ZOOM2U</option>
              <option>TGE</option>
            </select>
            <p v-if="errors.delivery_provider" class="text-red-600 text-sm mt-1">{{ errors.delivery_provider }}</p>
          </div>

          <div>
            <select v-model="form.priority" :class="['input', errors.priority ? 'border-red-500' : '']">
              <option disabled value="">Select Priority</option>
              <option>Standard</option>
              <option>Express</option>
              <option>Immediate</option>
            </select>
            <p v-if="errors.priority" class="text-red-600 text-sm mt-1">{{ errors.priority }}</p>
          </div>

          <div>
            <input v-model="form.pickup_date" type="date" :class="['input', errors.pickup_date ? 'border-red-500' : '']" />
            <p v-if="errors.pickup_date" class="text-red-600 text-sm mt-1">{{ errors.pickup_date }}</p>
          </div>

          <div>
            <input v-model="form.pickup_time" type="time" :class="['input', errors.pickup_time ? 'border-red-500' : '']" />
            <p v-if="errors.pickup_time" class="text-red-600 text-sm mt-1">{{ errors.pickup_time }}</p>
          </div>
        </div>
      </div>

      <!-- Package Info -->
      <div class="mb-6">
        <h3 class="text-lg font-semibold mb-2">Package Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <input v-model="form.package_description" type="text" placeholder="Package Description"
              :class="['input', errors.package_description ? 'border-red-500' : '']" />
            <p v-if="errors.package_description" class="text-red-600 text-sm mt-1">{{ errors.package_description }}</p>
          </div>

          <div>
            <input v-model="form.length" type="number" placeholder="Length (cm)"
              :class="['input', errors.length ? 'border-red-500' : '']" />
            <p v-if="errors.length" class="text-red-600 text-sm mt-1">{{ errors.length }}</p>
          </div>

          <div>
            <input v-model="form.height" type="number" placeholder="Height (cm)"
              :class="['input', errors.height ? 'border-red-500' : '']" />
            <p v-if="errors.height" class="text-red-600 text-sm mt-1">{{ errors.height }}</p>
          </div>

          <div>
            <input v-model="form.width" type="number" placeholder="Width (cm)"
              :class="['input', errors.width ? 'border-red-500' : '']" />
            <p v-if="errors.width" class="text-red-600 text-sm mt-1">{{ errors.width }}</p>
          </div>

          <div>
            <input v-model="form.weight" type="number" placeholder="Weight (kg)"
              :class="['input', errors.weight ? 'border-red-500' : '']" />
            <p v-if="errors.weight" class="text-red-600 text-sm mt-1">{{ errors.weight }}</p>
          </div>
        </div>
      </div>

      <button type="submit"
        class="w-full md:w-auto bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Submit</button>
    </form>

    <div class="mt-4">
      <a href="/deliveries" class="text-blue-600 hover:underline">View Delivery Requests</a>
    </div>
  </div>
</template>

<style scoped>
.input {
  @apply w-full p-2 border rounded focus:outline-none focus:ring focus:ring-blue-300;
}
</style>
