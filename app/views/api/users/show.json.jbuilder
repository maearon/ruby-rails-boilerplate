json.microposts do
  json.array! @microposts
end
json.total_count @total
