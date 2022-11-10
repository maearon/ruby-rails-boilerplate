if @current_user then
json.name @current_user.name
json.avatar "https://secure.gravatar.com/avatar/#{Digest::MD5::hexdigest(@current_user.email.downcase)}?s=50"
json.userid @current_user.id
json.email @current_user.email
json.signature 'Be tolerant to diversity, tolerance is a virtue'
json.title 'Interaction expert'
json.group 'Ant Financial - XX Business Group - XX Platform Department - XX Technology Department - UED'
json.tags [
  {
    key: '0',
    label: 'Very thoughtful',
  },
  {
    key: '1',
    label: 'Focus on design',
  },
  {
    key: "2'Hot~",
  },
  {
    key: '3',
    label: 'Long legs',
  },
  {
    key: '4',
    label: 'C change girl',
  },
  {
    key: '5',
    label: 'All rivers are inclusive',
  },
]
json.notifyCount 12
json.unreadCount 11
json.country 'Vietnam'
json.access 'admin'
json.geographic do
  json.province do
    json.label 'Zhejiang Province'
    json.key '330000'
  end
  json.city do
    json.label 'Hangzhou'
    json.key '330100'
  end
end
json.address 'No. 77 Gongzhuan Road, Xihu District'
json.phone '0912-915132888'
end
