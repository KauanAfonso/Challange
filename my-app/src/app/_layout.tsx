
import { View, StyleSheet } from 'react-native';
import { GestureHandlerRootView } from 'react-native-gesture-handler';
import { Drawer } from 'expo-router/drawer';

export default function Layout() {
  return (
    //Renderizando o drawer com o GestureHandlerRootView
    // O GestureHandlerRootView é necessário para que o Drawer funcione corretamente
    <GestureHandlerRootView>
      <Drawer
        screenOptions={{
          headerStyle: { backgroundColor: '#84A98C' },
          drawerStyle: { backgroundColor: '#84A98C' },
        }}
      />
    </GestureHandlerRootView>
  );
}

