package dto

type AgamaUpdateDTO struct {
	ID    uint   `json:"id" form:"id"`
	Agama  string `json:"agama" form:"agama" binding:"required,min=3,max=255"`
}

type AgamaCreateDTO struct {
	Agama  string `json:"agama" form:"agama" binding:"required,min=3,max=255"`
}
