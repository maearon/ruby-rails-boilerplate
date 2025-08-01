target_user = User.find_by(id: 'nlnhmwy63wdh4uzp')

User.where.not(id: target_user.id).find_each do |user|
  user.follow(target_user) unless user.following?(target_user)
end