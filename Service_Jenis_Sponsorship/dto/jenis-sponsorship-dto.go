package dto

type JenisSponsorshipUpdateDTO struct {
	ID               uint   `json:"id" form:"id"`
	JenisSponsorship string `json:"jenis_sponsorship" form:"jenis_sponsorship" binding:"required,min=3,max=255"`
	Deskripsi        string `json:"deskripsi" form:"deskripsi" binding:"required,min=3,max=255"`
}

type JenisSponsorshipCreateDTO struct {
	JenisSponsorship string `json:"jenis_sponsorship" form:"jenis_sponsorship" binding:"required,min=3,max=255"`
	Deskripsi        string `json:"deskripsi" form:"deskripsi" binding:"required,min=3,max=255"`
}
