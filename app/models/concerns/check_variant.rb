module CheckVariant
  extend ActiveSupport::Concern
  included do
    # Validates
    # validates :first_name, presence: true, length: { in: 1..16 }
    # Callbacks
    # after_validation :set_full_name
    # Devise
  end
  private
    # def set_full_name
    #   self.full_name = (last_name + first_name) if first_name && last_name
    #   self.full_name_furigana = (last_name_furigana + first_name_furigana) if first_name_furigana && last_name_furigana
end
