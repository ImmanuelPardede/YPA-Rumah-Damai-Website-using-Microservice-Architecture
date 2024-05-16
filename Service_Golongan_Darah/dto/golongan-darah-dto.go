package dto

type GolonganDarahUpdateDTO struct {
	ID            uint   `json:"id" form:"id"`
	GolonganDarah string `json:"golongan_darah" form:"golongan_darah" binding:"required,min=1,max=255"`
}

type GolonganDarahCreateDTO struct {
	GolonganDarah string `json:"golongan_darah" form:"golongan_darah" binding:"required,min=1,max=255"`
}
