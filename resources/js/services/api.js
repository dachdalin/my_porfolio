import axios from "axios"

const apiClient = axios.create({
  baseURL: "/api",
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
    "X-Requested-With": "XMLHttpRequest",
  },
})

apiClient.interceptors.request.use((config) => {
  const token = document.head.querySelector('meta[name="csrf-token"]')

  if (token) {
    config.headers["X-CSRF-TOKEN"] = token.content
  }

  return config
})

export default {
  // Products
  getProducts(page = 1) {
    return apiClient.get(`/technologies?page=${page}`)
  },

  getProduct(id) {
    return apiClient.get(`/technologies/${id}`)
  },

  createProduct(product) {
    return apiClient.post("/technologies", product)
  },

  updateProduct(id, product) {
    return apiClient.put(`/technologies/${id}`, product)
  },

  deleteProduct(id) {
    return apiClient.delete(`/technologies/${id}`)
  },
}
