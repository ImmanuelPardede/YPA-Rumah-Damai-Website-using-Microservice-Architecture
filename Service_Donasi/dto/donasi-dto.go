package dto

type DonasiUpdateDTO struct {
	ID        uint   `json:"id" form:"id"`
	Donasi    string `json:"donasi" form:"donasi" binding:"required,min=3,max=255"`
	Deskripsi string `json:"deskripsi" form:"deskripsi" binding:"required,min=3,max=255"`
}

type DonasiCreateDTO struct {
	Donasi    string `json:"donasi" form:"donasi" binding:"required,min=3,max=255"`
	Deskripsi string `json:"deskripsi" form:"deskripsi" binding:"required,min=3,max=255"`
}
