import { View, StyleSheet } from 'react-native';
import { GestureHandlerRootView } from 'react-native-gesture-handler';
import { Drawer } from 'expo-router/drawer';
import { usePathname, Slot } from 'expo-router';
import { AuthProvider, useAuth } from './auth/AuthContext'; // ajuste o caminho se necessário

function AppLayout() {
  const pathname = usePathname();
  const { isLoggedIn } = useAuth();

  // Se estiver na tela de login, só mostra a tela sem o Drawer
  if (pathname === '/pages/login') {
    return <Slot />;
  }

  // Se não estiver logado, não mostra o Drawer
  if (!isLoggedIn) {
    return <Slot />;
  }

  return (
    <Drawer
      screenOptions={{
        headerStyle: { backgroundColor: '#84A98C' },
        drawerStyle: { backgroundColor: '#84A98C' },
      }}
    />
  );
}

export default function LayoutWrapper() {
  return (
    <GestureHandlerRootView style={{ flex: 1 }}>
      <AuthProvider>
        <AppLayout />
      </AuthProvider>
    </GestureHandlerRootView>
  );
}
