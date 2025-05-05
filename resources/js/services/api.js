import axios from "axios"

const apiClient = axios.create({
  baseURL: "/api",
  headers: {
    Accept: "application/json",
    "X-Requested-With": "XMLHttpRequest",
  },
});

apiClient.interceptors.request.use((config) => {
  const token = document.head.querySelector('meta[name="csrf-token"]')

  if (token) {
    config.headers["X-CSRF-TOKEN"] = token.content
  }
  if (config.data instanceof FormData) {
    config.headers["Content-Type"] = "multipart/form-data"
  } else {
    config.headers["Content-Type"] = "application/json"
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

  postConfigure(config) {
    return apiClient.post("/settings", config)
  },
    getConfigure() {
        return apiClient.get("/settings/get-data")
    },

    getProject() {
        return apiClient.get("/projects")
    },
    createProject(project) {
        return apiClient.post("/projects", project)
    },
    updateProject(id, project) {
        return apiClient.put(`/projects/${id}`, project)
    },
    deleteProject(id) {
        return apiClient.delete(`/projects/${id}`)
    },
    getUser(id) {
        return apiClient.get(`/get-user/${id}`)
    },
    updateUser(user) {
        return apiClient.put(`/update-user`, user)
    },

    getExperiense(page = 1) {
        return apiClient.get(`/experiense?page=${page}`)
    },
    getExperienseId(id) {
        return apiClient.get(`/experiense/${id}`)
    },
    createExperiense(experiense) {
        return apiClient.post("/experiense", experiense)
    },
    updateExperiense(id, experiense) {
        return apiClient.put(`/experiense/${id}`, experiense)
    },
    deleteExperiense(id) {
        return apiClient.delete(`/experiense/${id}`)
    },
    getEducation(page = 1) {
        return apiClient.get(`/education?page=${page}`)
    },
    getEducationId(id) {
        return apiClient.get(`/education/${id}`)
    },
    createEducation(education) {
        return apiClient.post("/education", education)
    },
    updateEducation(id, education) {
        return apiClient.put(`/education/${id}`, education)
    },
    deleteEducation(id) {
        return apiClient.delete(`/education/${id}`)
    },
}
