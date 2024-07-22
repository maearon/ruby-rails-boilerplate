import { configureStore, ThunkAction, Action } from '@reduxjs/toolkit';
import sessionReducer from './session/sessionSlice';

export const store = configureStore({
  reducer: {
    session: sessionReducer,
  },
});

export type AppDispatch = typeof store.dispatch;
export type RootState = ReturnType<typeof store.getState>;
export type AppThunk<ReturnType = void> = ThunkAction<
  ReturnType,
  RootState,
  unknown,
  Action<string>
>;
