package dto

type JenisKelaminUpdateDTO struct {
	ID           uint   `json:"id" form:"id"`
	JenisKelamin string `json:"jenis_kelamin" form:"jenis_kelamin" binding:"required,min=1,max=255"`
}

type JenisKelaminCreateDTO struct {
	JenisKelamin string `json:"jenis_kelamin" form:"jenis_kelamin" binding:"required,min=1,max=255"`
}
