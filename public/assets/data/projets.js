
var $table = $('#table')

$(function() {
  	var projet = [
	{
		"codeProjet": 100,
		"nomProjet": "pies"
	},
	{
		"codeProjet": 101,
		"nomProjet": "pasta"
	},
	{
		"codeProjet": 102,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 103,
		"nomProjet": "salads"
	},
	{
		"codeProjet": 104,
		"nomProjet": "pies"
	},
	{
		"codeProjet": 105,
		"nomProjet": "pies"
	},
	{
		"codeProjet": 106,
		"nomProjet": "desserts"
	},
	{
		"codeProjet": 107,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 108,
		"nomProjet": "pies"
	},
	{
		"codeProjet": 109,
		"nomProjet": "stews"
	},
	{
		"codeProjet": 110,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 111,
		"nomProjet": "pasta"
	},
	{
		"codeProjet": 112,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 113,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 114,
		"nomProjet": "seafood"
	},
	{
		"codeProjet": 115,
		"nomProjet": "stews"
	},
	{
		"codeProjet": 116,
		"nomProjet": "seafood"
	},
	{
		"codeProjet": 117,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 118,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 119,
		"nomProjet": "stews"
	},
	{
		"codeProjet": 120,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 121,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 122,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 123,
		"nomProjet": "salads"
	},
	{
		"codeProjet": 124,
		"nomProjet": "stews"
	},
	{
		"codeProjet": 125,
		"nomProjet": "seafood"
	},
	{
		"codeProjet": 126,
		"nomProjet": "pasta"
	},
	{
		"codeProjet": 127,
		"nomProjet": "seafood"
	},
	{
		"codeProjet": 128,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 129,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 130,
		"nomProjet": "sandwiches"
	},
	{
		"codeProjet": 131,
		"nomProjet": "stews"
	},
	{
		"codeProjet": 132,
		"nomProjet": "pies"
	},
	{
		"codeProjet": 133,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 134,
		"nomProjet": "pasta"
	},
	{
		"codeProjet": 135,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 136,
		"nomProjet": "seafood"
	},
	{
		"codeProjet": 137,
		"nomProjet": "pasta"
	},
	{
		"codeProjet": 138,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 139,
		"nomProjet": "salads"
	},
	{
		"codeProjet": 140,
		"nomProjet": "pies"
	},
	{
		"codeProjet": 141,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 142,
		"nomProjet": "seafood"
	},
	{
		"codeProjet": 143,
		"nomProjet": "salads"
	},
	{
		"codeProjet": 144,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 145,
		"nomProjet": "seafood"
	},
	{
		"codeProjet": 146,
		"nomProjet": "pasta"
	},
	{
		"codeProjet": 147,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 148,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 149,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 150,
		"nomProjet": "pies"
	},
	{
		"codeProjet": 151,
		"nomProjet": "seafood"
	},
	{
		"codeProjet": 152,
		"nomProjet": "sandwiches"
	},
	{
		"codeProjet": 153,
		"nomProjet": "salads"
	},
	{
		"codeProjet": 154,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 155,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 156,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 157,
		"nomProjet": "desserts"
	},
	{
		"codeProjet": 158,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 159,
		"nomProjet": "desserts"
	},
	{
		"codeProjet": 160,
		"nomProjet": "stews"
	},
	{
		"codeProjet": 161,
		"nomProjet": "pasta"
	},
	{
		"codeProjet": 162,
		"nomProjet": "stews"
	},
	{
		"codeProjet": 163,
		"nomProjet": "desserts"
	},
	{
		"codeProjet": 164,
		"nomProjet": "seafood"
	},
	{
		"codeProjet": 165,
		"nomProjet": "desserts"
	},
	{
		"codeProjet": 166,
		"nomProjet": "pasta"
	},
	{
		"codeProjet": 167,
		"nomProjet": "pies"
	},
	{
		"codeProjet": 168,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 169,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 170,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 171,
		"nomProjet": "pies"
	},
	{
		"codeProjet": 172,
		"nomProjet": "salads"
	},
	{
		"codeProjet": 173,
		"nomProjet": "desserts"
	},
	{
		"codeProjet": 174,
		"nomProjet": "sandwiches"
	},
	{
		"codeProjet": 175,
		"nomProjet": "pasta"
	},
	{
		"codeProjet": 176,
		"nomProjet": "sandwiches"
	},
	{
		"codeProjet": 177,
		"nomProjet": "desserts"
	},
	{
		"codeProjet": 178,
		"nomProjet": "sandwiches"
	},
	{
		"codeProjet": 179,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 180,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 181,
		"nomProjet": "pasta"
	},
	{
		"codeProjet": 182,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 183,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 184,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 185,
		"nomProjet": "desserts"
	},
	{
		"codeProjet": 186,
		"nomProjet": "soups"
	},
	{
		"codeProjet": 187,
		"nomProjet": "sandwiches"
	},
	{
		"codeProjet": 188,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 189,
		"nomProjet": "desserts"
	},
	{
		"codeProjet": 190,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 191,
		"nomProjet": "seafood"
	},
	{
		"codeProjet": 192,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 193,
		"nomProjet": "stews"
	},
	{
		"codeProjet": 194,
		"nomProjet": "stews"
	},
	{
		"codeProjet": 195,
		"nomProjet": "sandwiches"
	},
	{
		"codeProjet": 196,
		"nomProjet": "noodles"
	},
	{
		"codeProjet": 197,
		"nomProjet": "stews"
	},
	{
		"codeProjet": 198,
		"nomProjet": "cereals"
	},
	{
		"codeProjet": 199,
		"nomProjet": "soups"
	}
	]
	$table.bootstrapTable({data: projet})
})
