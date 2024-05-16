package model

import (
	"gorm.io/gorm"
)

type JenisSponsorship struct {
	gorm.Model
	JenisSponsorship string `gorm:"type:varchar(255)" json:"jenis_sponsorship"`
	Deskripsi        string `gorm:"type:varchar(255)" json:"deskripsi"`
}
